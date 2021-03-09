<li class="{{ Request::is('countries*') ? 'active' : '' }}">
    <a href="{{ route('countries.index') }}"><i class="fa fa-edit"></i><span>Countries</span></a>
</li>
<li class="{{ Request::is('cities*') ? 'active' : '' }}">
    <a href="{{ route('cities.index') }}"><i class="fa fa-edit"></i><span>Cities</span></a>
</li>

<li class="{{ Request::is('dreams*') ? 'active' : '' }}">
    <a href="{{ route('dreams.index') }}"><i class="fa fa-edit"></i><span>Dreams</span></a>
</li>

<li class="{{ Request::is('jobs*') ? 'active' : '' }}">
    <a href="{{ route('jobs.index') }}"><i class="fa fa-edit"></i><span>Jobs</span></a>
</li>
<li class="{{ Request::is('nationalities*') ? 'active' : '' }}">
    <a href="{{ route('nationalities.index') }}"><i class="fa fa-edit"></i><span>Nationalities</span></a>
</li>
<li class="{{ Request::is('customers*') ? 'active' : '' }}">
    <a href="{{ route('customers.index') }}"><i class="fa fa-edit"></i><span>Customers</span></a>
</li>

<li class="{{ Request::is('cases') ? 'active' : '' }}">
    <a href="{{ URL('cases') }}"><i class="fa fa-edit"></i><span>Cases</span></a>
</li>