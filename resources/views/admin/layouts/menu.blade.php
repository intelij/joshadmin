<li class="{{ Request::is('companies*') ? 'active' : '' }}">
    <a href="{!! route('admin.companies.index') !!}">
    <i class="livicon" data-c="#418BCA" data-hc="#418BCA" data-name="bank" data-size="18"
               data-loop="true"></i>
               Companies
    </a>
</li>

<!-- <li class="{{ Request::is('contactCompanies*') ? 'active' : '' }}">
    <a href="#">
    <i class="livicon" data-c="#EF6F6C" data-hc="#EF6F6C" data-name="bank" data-size="18"
               data-loop="true"></i>
               ContactCompanies
    </a>
</li>

<li class="{{ Request::is('departmentCompanies*') ? 'active' : '' }}">
    <a href="#">
    <i class="livicon" data-c="#EF6F6C" data-hc="#EF6F6C" data-name="bank" data-size="18"
               data-loop="true"></i>
               DepartmentCompanies
    </a>
</li> -->

<li class="{{ Request::is('analyses*') ? 'active' : '' }}">
    <a href="{!! route('admin.analyses.index') !!}">
    <i class="livicon" data-c="#418BCA" data-hc="#418BCA" data-name="list" data-size="18"
               data-loop="true"></i>
               Analyses
    </a>
</li>

<li class="{{ Request::is('rSLS*') ? 'active' : '' }}">
    <a href="{!! route('admin.rSLS.index') !!}">
    <i class="livicon" data-c="#EF6F6C" data-hc="#EF6F6C" data-name="list" data-size="18"
               data-loop="true"></i>
               RSLS
    </a>
</li>

<li class="{{ Request::is('prodSpecs*') ? 'active' : '' }}">
    <a href="{!! route('admin.prodSpecs.index') !!}">
    <i class="livicon" data-c="#EF6F6C" data-hc="#EF6F6C" data-name="list" data-size="18"
               data-loop="true"></i>
               ProdSpecs
    </a>
</li>

<li class="{{ Request::is('reports*') ? 'active' : '' }}">
    <a href="{!! route('admin.reports.index') !!}">
    <i class="livicon" data-c="#418BCA" data-hc="#418BCA" data-name="servers" data-size="18"
               data-loop="true"></i>
               Reports
    </a>
</li>

<li class="{{ Request::is('metadata*') ? 'active' : '' }}">
    <a href="{!! route('admin.metadata.index') !!}">
    <i class="livicon" data-c="#EF6F6C" data-hc="#EF6F6C" data-name="servers" data-size="18"
               data-loop="true"></i>
               Metadata
    </a>
</li>

<li class="{{ Request::is('suppliers*') ? 'active' : '' }}">
    <a href="{!! route('admin.suppliers.index') !!}">
    <i class="livicon" data-c="#EF6F6C" data-hc="#EF6F6C" data-name="servers" data-size="18"
               data-loop="true"></i>
               Suppliers
    </a>
</li>

<li class="{{ Request::is('results*') ? 'active' : '' }}">
    <a href="{!! route('admin.results.index') !!}">
    <i class="livicon" data-c="#EF6F6C" data-hc="#EF6F6C" data-name="servers" data-size="18"
               data-loop="true"></i>
               Results
    </a>
</li>

<li class="{{ Request::is('labs*') ? 'active' : '' }}">
    <a href="{!! route('admin.labs.index') !!}">
    <i class="livicon" data-c="#418BCA" data-hc="#418BCA" data-name="thumbnails-big" data-size="18"
               data-loop="true"></i>
               Labs
    </a>
</li>

<li class="{{ Request::is('contactLabs*') ? 'active' : '' }}">
    <a href="{!! route('admin.contactLabs.index') !!}">
    <i class="livicon" data-c="#EF6F6C" data-hc="#EF6F6C" data-name="thumbnails-big" data-size="18"
               data-loop="true"></i>
               ContactLabs
    </a>
</li>



