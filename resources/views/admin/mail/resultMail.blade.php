<!DOCTYPE html>
<html>

<head>
    <title>Hasil Rekrutmen ASLABTIF</title>
</head>

<body>
    <h1>Hasil Proses Rekrutmen Anda</h1>
    <h3>
        Halo {{ $registration->name }}
    </h3>
    <p>Kami ingin memberitahukan bahwa hasil penilaian Anda adalah:
        <strong>{{ $registration->test->result->result ?? '-' }}</strong>.
    </p>

    {{-- <p>
        Dengan Nilai Akhir: <strong>{{ $registration->test->result->finalScore }}</strong>
    </p> --}}

    <p>
        silahkan login ke <a href="{{ route('login') }}">sini</a> untuk melihat hasil selengkapnya.
    </p>
    <p>
        Terima kasih telah mendaftar sebagai asisten laboratorium.
    </p>
    {{--
    @if ($registration->status === 'Diterima')
        @if ($registration->test->result->result === 'Diterima')
            <x-primary-button tag="a" href="{{ route('result.accepted') }}">Lihat
                Hasil</x-primary-button>
        @elseif ($registration->test->result->result === 'Ditolak')
            <x-primary-button tag="a" href="{{ route('result.rejected') }}">Lihat
                Hasil</x-primary-button>
        @endif
    @endif --}}
</body>

</html>
