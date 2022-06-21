<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Anggota Divisi') }}
        </h2>
    </x-slot>

    <x-slot name="script">
        <script>
            var datatable = $('#crudTable').DataTable({
                ajax: {
                    url : '{!! url()->current() !!}'
                    // url yang sedang dibuka sekarang
                },
                columns: [
                    {data : 'id', name: 'id', width: '10%'},
                    {data : 'name', name: 'name'},
                    {data : 'position', name: 'position'},
                    {
                        data : 'action',
                        name : 'action',
                        ordertable : false,
                        searchable : false,
                        width : '25%'
                    }
                ],
            })
        </script>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="{{route('dashboard.division.divisionteam.create', $division->id)}}"  class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                    + Tambah Anggota
                </a>
            </div>
            @if ($pesan = Session::get('success'))
                <div class="mb-10">
                    <div class="bg-blue-500 text-white font-bold rounded-t px-4 py-2">
                        Berhasil
                    </div>
                    <div class="border border-t-0 border-blue-400 rounded-b bg-blue-100 px-4 py-3 text-blue-700">
                        <p>{{$pesan}}</p>
                    </div>
                </div>
            @endif
            @if ($pesan = Session::get('delete'))
                <div class="mb-10">
                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                        Berhasil
                    </div>
                    <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                        <p>{{$pesan}}</p>
                    </div>
                </div>
            @endif
            <div class="shadow overflow-hidden sm-rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="crudTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Posisi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
