<x-app-layout>
    <x-slot name="header_content">
        <h1>Dashboard</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Dashboard</div>
        </div>
    </x-slot>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4>Wellcome {{ Auth::user()->name }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
