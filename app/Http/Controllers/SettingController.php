<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logoSetting = Setting::where('key', 'site_logo')->first();
        $contact_name = Setting::fetch('contact_person_name');
        $contact_phone = Setting::fetch('contact_person_phone');
        $featured_video = Setting::fetch('featured_video_id');

        return view('folder_setting.setting', [
            'logoUrl' => $logoSetting?->getFirstMediaUrl('default', 'preview') ?? null,
            'contact_name' => $contact_name,
            'contact_phone' => $contact_phone,
            'featured_video' => $featured_video,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'image' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        // ]);

        // $setting = Setting::firstOrCreate(['key' => 'site_logo']);

        // $setting->addMediaFromRequest('image')->toMediaCollection('default');

        // return redirect()->route('folder_setting.setting')->with('success', 'Logo updated.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'image' => ['nullable','image', 'mimes:png', 'max:2048']
        ]);

        $setting = Setting::firstOrCreate(['key' => 'site_logo']);

        if($request->hasFile('image')){
            $setting->clearMediaCollection('default');
            $setting->addMediaFromRequest('image')->toMediaCollection('default');
        }

        return redirect()->route('folder_setting.setting');
    }

    public function updateContact(Request $request)
    {
        $request->validate([
        'contact_phone' => 'required|string',
        ]);

        Setting::change('contact_person_name', $request->contact_name);
        Setting::change('contact_person_phone', $request->contact_phone);

        return redirect()->route('folder_setting.setting');
    }

    public function updateVideo(Request $request)
    {
        $request->validate([
            'video_url' => 'required|url',
        ]);

        $videoUrl = $request->video_url;

        preg_match('/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|v\/))([\w-]{11})/', $videoUrl, $matches);

        if (!isset($matches[1])) {
            return redirect()->back()->withErrors(['video_url' => 'Invalid YouTube URL']);
        }

        $videoId = $matches[1];
        Setting::change('featured_video_id', $videoId);

        return redirect()->route('folder_setting.setting');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
