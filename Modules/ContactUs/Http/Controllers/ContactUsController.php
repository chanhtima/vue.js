<?php

namespace Modules\ContactUs\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Modules\ContactUs\Entities\ContactBranch;
use Notification;

use Modules\ContactUs\Entities\Contacts;
use Modules\ContactUs\Entities\ContactPages;
use Modules\ContactUs\Entities\ContactSubject;

// Contact Events 
use Modules\ContactUs\Events\ContactForm;
use Modules\ContactUs\Notifications\NotifyContactForm;


class ContactUsController extends Controller
{
    /**
     * Function : Get Contact Us Info
     * Dev : Joe
     * Update Date : 18 Nov 2021
     * @param POST
     * @return response of contact us info
     */
    public function getContact()
    {
        $data = [];
        $contact = ContactPages::find(1);
        if (!empty($contact)) {
            if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
                $data['name'] = $contact->name_th;
                $data['office'] = mwz_getTextString($contact->office_th);
                $data['desc'] = mwz_getTextString($contact->desc_th);
            } else {
                $data['name'] = $contact->name_en;
                $data['office'] = mwz_getTextString($contact->office_en);
                $data['desc'] = mwz_getTextString($contact->desc_en);
            }
            $line = json_decode($contact->line);
            $data['email'] = $contact->email;
            $data['phone'] = $contact->phone;
            $data['fax'] = $contact->fax;
            $data['facebook'] = $contact->facebook;
            $data['messenger'] = $contact->messenger;
            $data['line'] = $contact->line;
            $data['youtube'] = $contact->youtube;
            $data['instagram'] = $contact->instagram;
            $data['tiktok'] = $contact->tiktok;
            $data['ig'] = $contact->ig;
            $data['gmaps'] = $contact->gmaps;
        }
        return $data;
    }
    public function getContactSaving()
    {
        $data = [];
        $contact = ContactPages::find(1);
        if (!empty($contact)) {
            $data['image'] = $contact->image;
            if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
                $data['name'] = $contact->saving_name_th;
                $data['desc'] = mwz_getTextString($contact->saving_desc_th);
            } else {
                $data['name'] = $contact->saving_name_en;
                $data['desc'] = mwz_getTextString($contact->saving_desc_en);
            }
        }
        return $data;
    }

    /**
     * Function : Get Contact Us Subject
     * Dev : Joe
     * Update Date : 18 Nov 2021
     * @param POST
     * @return response of contact us info
     */
    public function getContactSubjects()
    {
        $lang = app()->getLocale();
        $subjects_data = ContactSubject::where('status', 1)->get()->toArray();
        $subjects = [];
        if (!empty($subjects_data)) {
            foreach ($subjects_data as $sbj) {
                $subjects[] = ['id' => $sbj['id'], 'subject' => $sbj["subject_$lang"]];
            }
        }
        return $subjects;
    }


    public function getBranch()
    {
        $data = [];
        $o_branch = ContactBranch::where('status', 1)->orderBy('sequence')->get();
        if (!empty($o_branch)) {
            foreach ($o_branch as $k => $val) {
                $data[$k]['id'] = $val->id;
                if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
                    $data[$k]['name'] = $val->name_th;
                } else {
                    $data[$k]['name'] = $val->name_en;
                }
            }
        }
        return $data;
    }

    public function findBranch($id = 0)
    {
        $data = [];
        $o_branch = new ContactBranch();
        if (!empty($id)) {
            $o_branch = $o_branch->where('id', $id);
        } else {
            $o_branch = $o_branch->where('status', 1)->orderBy('sequence');
        }
        $branch = $o_branch->first();
        if (!empty($branch)) {
            $data['id'] = $branch->id;
            if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
                $data['name'] = $branch->name_th;
                $data['office'] = mwz_getTextString($branch->office_th);
            } else {
                $data['name'] = $branch->name_en;
                $data['office'] = mwz_getTextString($branch->office_en);
            }
            $data['email'] = $branch->email;
            $data['phone'] = $branch->phone;
            $data['fax'] = $branch->fax;
            $data['facebook'] = $branch->facebook;
            $data['line'] = $branch->line;
            $data['youtube'] = $branch->youtube;
            $data['instagram'] = $branch->instagram;
            $data['tiktok'] = $branch->tiktok;
            $data['google_map'] = $branch->google_map;
        }
        return $data;
    }
}
