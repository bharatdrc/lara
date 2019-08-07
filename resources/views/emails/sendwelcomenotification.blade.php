Hello {{$eventparticipation->user->person->firstname}},

<br/>

Sie erhalten diese Nachricht, weil Sie sich für das Event {{$eventparticipation->event->eventname}} angemeldet haben test new2 and have not yet confirmed your participation. Make sure not to miss this great opportunity and start improving your networking experience at test new2 by confirming your participation now!
<br/>
Before you can start using the MeetingTool, please activate your account by setting a password
<br/>
<a href="{{URL::signedRoute('activateuserpartcipation',['participation'=>$eventparticipation])}}">Participate in event!</a>
<br/>
Your username for login is: {{$eventparticipation->user->email}}
<br/>
<br/>
If you cannot attend or would prefer not to use the MeetingTool, you can also cancel your participation.