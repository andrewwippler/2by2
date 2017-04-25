<li class="{{ Request::is('departments*') ? 'active' : '' }}">
    <a href="{!! route('departments.index') !!}"><i class="fa fa-edit"></i><span>Departments</span></a>
</li>

<li class="{{ Request::is('lifeStages*') ? 'active' : '' }}">
    <a href="{!! route('lifeStages.index') !!}"><i class="fa fa-edit"></i><span>LifeStages</span></a>
</li>

<li class="{{ Request::is('maritalStatuses*') ? 'active' : '' }}">
    <a href="{!! route('maritalStatuses.index') !!}"><i class="fa fa-edit"></i><span>MaritalStatuses</span></a>
</li>

<li class="{{ Request::is('prospectStatuses*') ? 'active' : '' }}">
    <a href="{!! route('prospectStatuses.index') !!}"><i class="fa fa-edit"></i><span>ProspectStatuses</span></a>
</li>

<li class="{{ Request::is('relationships*') ? 'active' : '' }}">
    <a href="{!! route('relationships.index') !!}"><i class="fa fa-edit"></i><span>Relationships</span></a>
</li>

<li class="{{ Request::is('spiritualConditions*') ? 'active' : '' }}">
    <a href="{!! route('spiritualConditions.index') !!}"><i class="fa fa-edit"></i><span>SpiritualConditions</span></a>
</li>

<li class="{{ Request::is('visitTypes*') ? 'active' : '' }}">
    <a href="{!! route('visitTypes.index') !!}"><i class="fa fa-edit"></i><span>VisitTypes</span></a>
</li>

<li class="{{ Request::is('visits*') ? 'active' : '' }}">
    <a href="{!! route('visits.index') !!}"><i class="fa fa-edit"></i><span>Visits</span></a>
</li>

<li class="{{ Request::is('people*') ? 'active' : '' }}">
    <a href="{!! route('people.index') !!}"><i class="fa fa-edit"></i><span>People</span></a>
</li>

<li class="{{ Request::is('households*') ? 'active' : '' }}">
    <a href="{!! route('households.index') !!}"><i class="fa fa-edit"></i><span>Households</span></a>
</li>

