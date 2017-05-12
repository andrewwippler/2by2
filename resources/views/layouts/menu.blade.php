<li class="treeview {{ Request::is('households*','people*','visits*') ? 'active' : '' }}">
    <a href="{!! route('households.index') !!}"><i class="fa fa-address-book "></i><span>Prospects</span></a>
</li>

{{-- Admin --}}
@role('admin')
<li class="treeview {{ Request::is('departments*',
    'lifeStages*',
    'maritalStatuses*',
    'prospectStatuses*',
    'relationships*',
    'spiritualConditions*',
    'visitTypes*',
    'teams*',
    'sundaySchools*'
    ) ? 'active' : '' }}">
    <a href="#">
                <i class="fa fa-cogs"></i> <span>Global Settings</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
  <ul class="treeview-menu">

    <li class="{{ Request::is('departments*') ? 'active' : '' }}">
        <a href="{!! route('departments.index') !!}"><i class="fa fa-object-group"></i><span>Departments</span></a>
    </li>

    <li class="{{ Request::is('lifeStages*') ? 'active' : '' }}">
        <a href="{!! route('lifeStages.index') !!}"><i class="fa fa-users"></i><span>LifeStages</span></a>
    </li>

    <li class="{{ Request::is('maritalStatuses*') ? 'active' : '' }}">
        <a href="{!! route('maritalStatuses.index') !!}"><i class="fa fa-venus-mars"></i><span>MaritalStatuses</span></a>
    </li>

    <li class="{{ Request::is('prospectStatuses*') ? 'active' : '' }}">
        <a href="{!! route('prospectStatuses.index') !!}"><i class="fa fa-star-o"></i><span>ProspectStatuses</span></a>
    </li>

    <li class="{{ Request::is('relationships*') ? 'active' : '' }}">
        <a href="{!! route('relationships.index') !!}"><i class="fa fa-arrows-alt"></i><span>Relationships</span></a>
    </li>

    <li class="{{ Request::is('spiritualConditions*') ? 'active' : '' }}">
        <a href="{!! route('spiritualConditions.index') !!}"><i class="fa fa-heart"></i><span>SpiritualConditions</span></a>
    </li>

    <li class="{{ Request::is('visitTypes*') ? 'active' : '' }}">
        <a href="{!! route('visitTypes.index') !!}"><i class="fa fa-envelope"></i><span>VisitTypes</span></a>
    </li>

    <li class="{{ Request::is('teams*') ? 'active' : '' }}">
        <a href="{!! route('teams.index') !!}"><i class="fa fa-user-plus"></i><span>Teams</span></a>
    </li>

    <li class="{{ Request::is('sundaySchools*') ? 'active' : '' }}">
        <a href="{!! route('sundaySchools.index') !!}"><i class="fa fa-user-circle"></i><span>SundaySchools</span></a>
    </li>
  </ul>
</li>

<li class="treeview {{ Request::is(
    'profiles*'
    ) ? 'active' : '' }}">
    <a href="#">
                <i class="fa fa-lock"></i> <span>Admin</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
  <ul class="treeview-menu">
    <li class="{{ Request::is('profiles*') ? 'active' : '' }}">
        <a href="{!! route('profiles.index') !!}"><i class="fa fa-id-card-o"></i><span>Profiles</span></a>
    </li>
  </ul>
</li>

<li class="treeview {{ Request::is(

    ) ? 'active' : '' }}">
    <a href="#">
                <i class="fa fa-area-chart "></i> <span>Reports</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
  <ul class="treeview-menu">
    <li class="{{ Request::is(false) ? 'active' : '' }}">
        <a href="#"><i class="fa fa-id-bar-chart"></i><span>Coming Soon!</span></a>
    </li>
  </ul>
</li>
@endrole

<li class="treeview {{ Request::is('profiles*') ? 'active' : '' }}">
    <a href="{!! url('profiles').'/'!!}{!! Auth::user()->id !!}/edit"><i class="fa fa-cog"></i><span>My Profile</span></a>
</li>
