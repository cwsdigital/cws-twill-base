<?php
/**
 *
 */
namespace App\Repositories\Behaviours;


use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Date;

trait HandleEnquiries {

    /**
     * Gets read enquiry count
     * @return int
     */
    public function getCountForRead()
    {
        $query = $this->model->newQuery();
        return $this->filter($query, $this->countScope)->read()->count();
    }

    /**
     * Gets unread enquiry count
     * @return int
     */
    public function getCountForUnread()
    {
        $query = $this->model->newQuery();
        return $this->filter($query, $this->countScope)->unread()->count();
    }

    /**
     * This is a magic method called from the repository
     * Allows for traits to add new values into status filter scopes
     *
     * @param $slug
     * @return int | bool
     */
    public function getCountByStatusSlugHandleEnquiries($slug)
    {
        if ($slug === 'read') {
            return $this->getCountForRead();
        }
        if ($slug === 'unread') {
            return $this->getCountForUnread();
        }

        return false;
    }

    public function prepareFieldsBeforeSaveHandleEnquiries($object, $fields){
        $user = auth('twill_users')->user();
        if(array_key_exists('read', $fields)) {
            if ($fields['read']) {
                //set read_at and read_by
                $fields['read_at'] = Carbon::now()->toDateTimeString();
                $fields['read_by'] = $user->id;
            } else {
                //unset read_at and read_by
                $fields['read_at'] = null;
                $fields['read_by'] = null;
            }
        }

        return $fields;
    }

}
