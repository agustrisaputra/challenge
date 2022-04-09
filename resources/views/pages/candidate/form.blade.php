@php
$name = request()->routeIs('candidates.create') ? 'Add New Candidate' : $candidate->name;
$url = request()->routeIs('candidates.create') ? route('candidates.store') : route('candidates.update', $candidate->id);
$isEdit = request()->routeIs('candidates.edit');
$disabled = request()->routeIs('candidates.show');
@endphp

<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ $name }}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="{{ route('candidates.index') }}">Candidates</a></div>
            <div class="breadcrumb-item">{{ $name }}</div>
        </div>
    </x-slot>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ request()->routeIs('candidates.create') ? 'Add New Candidate' : 'Edit Candidate' }}
                        </h4>
                    </div>
                    <form action="{{ $url }}" method="POST" enctype="multipart/form-data">
                        <div class="card-body">

                            @csrf
                            @if ($isEdit)
                                @method('PATCH')
                            @endif

                            <div class="form-row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name') ?? $candidate->name }}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                value="{{ old('email') ?? $candidate->email }}">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="number" name="phone"
                                                class="form-control @error('phone') is-invalid @enderror"
                                                value="{{ old('phone') ?? $candidate->phone }}">
                                            @error('phone')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Education</label>
                                            <input type="text" name="education"
                                                class="form-control @error('education') is-invalid @enderror"
                                                value="{{ old('education') ?? $candidate->education }}">
                                            @error('education')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Birthday</label>
                                            <input type="text" name="dob"
                                                class="form-control datepicker @error('dob') is-invalid @enderror"
                                                value="{{ old('dob') ?? $candidate->dob }}">
                                            @error('dob')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Experience</label>
                                            <input type="text" name="experience"
                                                class="form-control @error('experience') is-invalid @enderror"
                                                value="{{ old('experience') ?? $candidate->experience }}">
                                            @error('experience')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Last Position</label>
                                            <input type="text" name="last_position"
                                                class="form-control @error('last_position') is-invalid @enderror"
                                                value="{{ old('last_position') ?? $candidate->last_position }}">
                                            @error('last_position')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Applied Position</label>
                                            <input type="text" name="applied_position"
                                                class="form-control @error('applied_position') is-invalid @enderror"
                                                value="{{ old('applied_position') ?? $candidate->applied_position }}">
                                            @error('applied_position')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Top 5 Skills</label>
                                            <input type="text" name="skills"
                                                class="form-control inputtags @error('skills') is-invalid @enderror"
                                                value="{{ old('skills') ?? $candidate->skills }}">
                                            @error('skills')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Resume</label>
                                            @if ($candidate->resume)
                                                <a href="{{ $candidate->resume }}" target="blank">
                                                    <i class="fas fa-cloud-download-alt"></i>
                                                    Download Resume
                                                </a>
                                            @endif
                                            <div class="custom-file">
                                                <input type="file" name="resume"
                                                    class="custom-file-input @error('resume') is-invalid @enderror"
                                                    id="customFile" value="{{ old('resume') }}">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                                @error('resume')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            @if (!$disabled)
                                <button class="btn btn-primary" type="submit">Submit</button>
                            @else
                                <a href="{{ route('candidates.index') }}" class="btn btn-secondary">Back</a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @slot('script')
        <script>
            $(".inputtags").tagsinput({
                trimValue: true
            });
        </script>
    @endslot
</x-app-layout>
