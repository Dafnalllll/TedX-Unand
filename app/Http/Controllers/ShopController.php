<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Merch;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\AdminActivity;
use App\Models\Event;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $merchs = Merch::latest()->get();
        $tickets = Ticket::latest()->get();
        return view('pages.admin.shop', compact('merchs', 'tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.admin.shop.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = Category::find($request->category_id);

        if (!$category) {
            return back()->with('error', 'Category not found!');
        }

        if ($category->name === 'Merchandise') {
            $validated = $request->validate([
                'item' => 'required|string|max:255',
                'stock' => 'required|integer|min:0',
                'price' => 'required|numeric|min:0',
                'photo' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            ]);
            $photoPath = $request->file('photo')->store('merch_photos', 'public');
            $merch = Merch::create([
                'item' => $validated['item'],
                'stock' => $validated['stock'],
                'price' => $validated['price'],
                'photo' => $photoPath,
                'category_id' => $category->id,
            ]);
            // Create AdminActivity
            AdminActivity::create([
                'activity' => 'Merchandise <span style="border:1.5px solid #f472b6; color:#f472b6; background:#fff; border-radius:6px; padding:2px 10px; font-weight:bold; display:inline-block;">' . e($merch->item) . '</span> Created Successfully!.'
            ]);
        } else if ($category->name === 'Ticket') {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric|min:0',
            ]);
            Ticket::create([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'price' => $validated['price'],
                'category_id' => $category->id,
            ]);
        }

        return redirect()->route('dashboard.shop.shop')->with('success', 'Shop item created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $merch = Merch::find($id);
        $ticket = Ticket::find($id);

        // Cek apakah ID milik merch atau ticket
        if ($merch) {
            return view('pages.admin.shop.edit', [
                'item' => $merch,
                'categories' => $categories,
                'type' => 'merch'
            ]);
        } elseif ($ticket) {
            return view('pages.admin.shop.edit', [
                'item' => $ticket,
                'categories' => $categories,
                'type' => 'ticket'
            ]);
        } else {
            return redirect()->route('dashboard.shop.shop')->with('error', 'Item not found!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $merch = Merch::find($id);
        $ticket = Ticket::find($id);

        if ($merch) {
            $validated = $request->validate([
                'item' => 'required|string|max:255',
                'stock' => 'required|integer|min:0',
                'price' => 'required|numeric|min:0',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
                'category_id' => 'required|exists:categories,id',
            ]);
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('merch_photos', 'public');
                $merch->photo = $photoPath;
            }
            $merch->item = $validated['item'];
            $merch->stock = $validated['stock'];
            $merch->price = $validated['price'];
            $merch->category_id = $validated['category_id'];
            $merch->save();

            // Update AdminActivity
            AdminActivity::create([
                'activity' => 'Merchandise <span style="border:1.5px solid #f472b6; color:#f472b6; background:#fff; border-radius:6px; padding:2px 10px; font-weight:bold; display:inline-block;">' . e($merch->item) . '</span> Updated Successfully!.'
            ]);

            return redirect()->route('dashboard.shop.shop')->with('success', 'Merchandise updated!');
        } elseif ($ticket) {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric|min:0',
                'category_id' => 'required|exists:categories,id',
            ]);
            $ticket->name = $validated['name'];
            $ticket->description = $validated['description'];
            $ticket->price = $validated['price'];
            $ticket->category_id = $validated['category_id'];
            $ticket->save();

            return redirect()->route('dashboard.shop.shop')->with('success', 'Ticket updated!');
        } else {
            return redirect()->route('dashboard.shop.shop')->with('error', 'Item not found!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $merch = Merch::find($id);
        $ticket = Ticket::find($id);

        if ($merch) {
            $merchName = $merch->item;
            $merch->delete();
            AdminActivity::create([
                'activity' => 'Merchandise <span style="border:1.5px solid #f472b6; color:#f472b6; background:#fff; border-radius:6px; padding:2px 10px; font-weight:bold; display:inline-block;">' . e($merchName) . '</span> Deleted Successfully!.'
            ]);
            return redirect()->route('dashboard.shop.shop')->with('success', 'Merchandise deleted!');
        } elseif ($ticket) {
            $ticket->delete();
            return redirect()->route('dashboard.shop.shop')->with('success', 'Ticket deleted!');
        } else {
            return redirect()->route('dashboard.shop.shop')->with('error', 'Item not found!');
        }
    }

    /**
     * Sell the specified ticket.
     */
    public function sell(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
        $event = Event::find($ticket->event_id);
        $jumlah = $request->input('jumlah');

        // ...proses penjualan...

        AdminActivity::create([
            'activity' => "Tiket <b>{$event->title}</b> terjual sebanyak <b>{$jumlah}</b>."
        ]);

        return back()->with('success', 'Ticket sold!');
    }

    /**
     * Sell the specified merchandise.
     */
    public function sellMerch(Request $request, $id)
    {
        $merch = Merch::findOrFail($id);
        $jumlah = $request->input('jumlah');

        // ...proses penjualan...

        AdminActivity::create([
            'activity' => "Merchandise <b>{$merch->name}</b> terjual sebanyak <b>{$jumlah}</b> pcs."
        ]);

        return back()->with('success', 'Merchandise sold!');
    }
}
