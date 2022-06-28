<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Facility;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index(Request $request, $category = null)
    {
        $facilities = null;

        if($category)
            $facilities = Facility::where('category', $category)->with('images')->get();
        else
            $facilities = Facility::with('images')->get();  

        return view('dashboard', [
            "facilities" => $facilities,
            "category" => $category
        ]);
    }

    public function getFacilityDetail(Request $request, int $id)
    {
        $facility = Facility::with('images')->where('id', $id)->first();

        return view('facility-detail', compact('facility'));
    }

    public function booking(Request $request, int $id)
    {
        $facility = Facility::findOrFail($id);

        return view('booking', compact('facility'));
    }

    public function storeImageFile($file)
    {
        if($file) {
            $name = Storage::put('/public/uploads/', $file);

            $visibility = Storage::getVisibility($name);
            Storage::setVisibility($name, 'public');

            $url = Storage::url($name);

            return $name;
        }
        return null;
    }

    public function makeBooking(Request $request, int $id)
    {
        $facility = Facility::findOrFail($id);

        $request->validate([
            'description' => 'required|max:255',
            'book_date' => 'required|date|after:' . date('Y-m-d'),
            'duration' => 'required|numeric|min:1|max:8',
            'participants' => 'required|numeric|max:' . $facility->quota,
            'berkas' => 'required|mimes:pdf,jpg,jpeg,png|max:2048'
        ]);

        $proposalName = self::storeImageFile($request->proposal);
        $berkasName = self::storeImageFile($request->berkas);

        $flight = Transaction::create([
            'book_date' => Carbon::now(),
            'duration' => $request->duration,
            'participants' => $request->participants,
            'proposal' => $proposalName,
            'berkas' => $berkasName,
            'description' => $request->description,
            'status' => 'pending',
            'is_verified' => false,
            'admin_id' => $facility->admin_id,
            'user_id' => auth()->user()->id,
            'facility_id' => $id
        ]);

        return redirect('/')->with('booking-success', 'Booking berhasil dilakukan!');
    }

    public function profile()
    {
        return view('profile');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:rfc,dns',
            'phone_number' => 'required',
            // 'phone_number' => 'required|regex:^(^\\+62|62|^08)(\\d{3,4}-?){2}\\d{3,4}$',
            'institusi' => 'required|max:255'
        ]);

        User::where('id', auth()->user()->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'institusi' => $request->institusi
            ]);

        return redirect()->back()->with('update-success', 'Pembaruan data berhasil dilakukan');
    }

    public function history()
    {
        $transactions = Transaction::where('user_id', auth()->user()->id)->get();

        return view('history', compact('transactions'));
    }
}
