@component('mail::message')
    Here are the details of the enquiry:

    **Name:** {{ $enquiry->name }}

    **Company:** {{ $enquiry->company }}

    **Email:** {{ $enquiry->email }}

    **Phone:** {{ $enquiry->phone ?? '*(not provided)*' }}

    **Message:**<br />
    {{ $enquiry->message }}

@endcomponent
