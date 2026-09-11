<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                {{-- Pesan sukses --}}
                @if (session('success'))
                    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Tombol tambah --}}
                <div class="flex justify-between mb-4">

                    <a href="{{ route('mahasiswas.create') }}"
                       class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        + Tambah Mahasiswa
                    </a>

                </div>

                {{-- Tabel mahasiswa --}}
                <div class="overflow-x-auto">

                    <table class="min-w-full divide-y divide-gray-200">

                        <thead class="bg-gray-50">

                            <tr>

                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    No
                                </th>

                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    NIM
                                </th>

                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Nama Mahasiswa
                                </th>

                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Tempat Lahir
                                </th>

                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Tanggal Lahir
                                </th>

                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Jenis Kelamin
                                </th>

                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Program Studi
                                </th>

                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Nomor HP
                                </th>

                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Email
                                </th>

                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">
                                    Aksi
                                </th>

                            </tr>

                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">

                            @forelse ($mahasiswas as $index => $mahasiswa)

                                <tr>

                                    <td class="px-6 py-4">
                                        {{ $index + 1 }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $mahasiswa->nim }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $mahasiswa->nama_mahasiswa }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $mahasiswa->tempat_lahir }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $mahasiswa->tanggal_lahir }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $mahasiswa->jenis_kelamin }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $mahasiswa->program_studi }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $mahasiswa->nomor_hp }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $mahasiswa->email }}
                                    </td>

                                    <td class="px-6 py-4 text-center">

                                        {{-- Detail --}}
                                        <a href="{{ route('mahasiswas.show', $mahasiswa->id) }}"
                                           class="text-blue-600 hover:text-blue-900 mr-2">
                                            Detail
                                        </a>

                                        {{-- Edit --}}
                                        <a href="{{ route('mahasiswas.edit', $mahasiswa->id) }}"
                                           class="text-indigo-600 hover:text-indigo-900 mr-2">
                                            Edit
                                        </a>

                                        {{-- Hapus --}}
                                        <form action="{{ route('mahasiswas.destroy', $mahasiswa->id) }}"
                                              method="POST"
                                              class="inline">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    onclick="return confirm('Yakin ingin menghapus data mahasiswa ini?')"
                                                    class="text-red-600 hover:text-red-900">
                                                Hapus
                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="10"
                                        class="px-6 py-4 text-center text-gray-500">

                                        Belum ada data mahasiswa.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>