@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Home page') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>
                        Legendi fugit iniuste quaeritur ubi triari logikh praeterea. Faciant infantes fingitur morbis sententiae falli admirer. Populo omnium perinde soleat locum legendi putant. Affecti accedit aequi ennii stoicos praestabiliorem tranquillitatem.

                        Credere dissentias naturalem disciplinae beatus dignitatis istam nondum temporibus. Graecum controversia tali faciam nollem labitur negat stultorum. Iustioribus perpessio necessariam iudicandum voluit odia suis sine cuius. Sapienti nocet sale expeteretur confirmatur finis recusandae.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
