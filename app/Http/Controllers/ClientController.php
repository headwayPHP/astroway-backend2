<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;



class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return response()->json(['status' => true, 'data' => $clients]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'client_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'in:active,inactive',
        ]);

        $data = $request->only(['client_name', 'status']);

        // Handle file upload
        if ($request->hasFile('client_image')) {
            $file = $request->file('client_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/clients'), $filename);
            $data['client_image'] = 'uploads/clients/' . $filename;
        }

        $client = Client::create($data);

        return response()->json(['status' => true, 'message' => 'Client created successfully', 'data' => $client]);
    }

    public function show($id)
    {
        $client = Client::find($id);
        if (!$client) {
            return response()->json(['status' => false, 'message' => 'Client not found']);
        }

        return response()->json(['status' => true, 'data' => $client]);
    }

    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        if (!$client) {
            return response()->json(['status' => false, 'message' => 'Client not found']);
        }

        $request->validate([
            'client_name' => 'sometimes|string|max:255',
            'client_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'in:active,inactive',
        ]);

        $data = $request->only(['client_name', 'status']);

        if ($request->hasFile('client_image')) {
            $file = $request->file('client_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/clients'), $filename);
            $data['client_image'] = 'uploads/clients/' . $filename;
        }

        $client->update($data);

        return response()->json(['status' => true, 'message' => 'Client updated successfully', 'data' => $client]);
    }

    public function destroy($id)
    {
        $client = Client::find($id);
        if (!$client) {
            return response()->json(['status' => false, 'message' => 'Client not found']);
        }

        $client->delete();
        return response()->json(['status' => true, 'message' => 'Client deleted successfully']);
    }
}