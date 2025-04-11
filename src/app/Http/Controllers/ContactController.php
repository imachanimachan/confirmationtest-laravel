<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Support\Facades\Response;


class ContactController extends Controller
{
    public function index()
    {
        $contact = session('contact_input', []);

        $genders = collect([
            1 => '男性',
            2 => '女性',
            3 => 'その他',
        ]);    
        
        $categories = Category::all();
        return view('index', compact('genders', 'categories','contact'));
    }


    public function confirm(ContactRequest $request)
    {

        $contact = $request->only(['last_name', 'first_name','gender', 'email', 'tel1', 'tel2', 'tel3' ,'address' , 'building', 'detail', 'category_id']);
        

        $genderMap = [
            '1' => '男性',
            '2' => '女性',
            '3' => 'その他'
        ];
        $contact['gender'] = $genderMap[$contact['gender']] ?? '未設定';

        session()->put('contact_input', $contact);

        $category = Category::find($contact['category_id']);

        return view('confirm', compact('contact', 'category'));
    }
          
    public function create(Request $request)
    {

        $tel = $request->input('tel1') . $request->input('tel2') . $request->input('tel3');
        $contact['tel'] = $tel;
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email','tel','address', 'building', 'detail', 'category_id']);
    

        $genderMap = [
            '男性' => '1',
            '女性' => '2',
            'その他' => '3'
        ];
        $contact['gender'] = $genderMap[$contact['gender']];
        Contact::create($contact, $tel);
        return view('thanks');
    }
}