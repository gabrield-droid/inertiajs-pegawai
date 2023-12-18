<template>
    <div class="mt-5">
        <!-- flash message -->
        <div v-if="$page.props.flash.message" class="alert alert-success" role="alert">
            {{ $page.props.flash.message }}
        </div>
        <!-- flash message -->
        <div class="mb-3">
            <a href="/pegawais/create" class="btn btn-md btn-primary">TAMBAH PEGAWAI</a>
        </div>
        <div class="card border-0 rounded shadow-sm">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="pegawai in pegawais" :key="pegawai.id">
                            <td>{{ pegawai.nama_pegawai }}</td>
                            <td>{{ pegawai.jabatan }}</td>
                            <td>{{ pegawai.jenis_kelamin }}</td>
                            <td>{{ pegawai.tgl_lahir }}</td>
                            <td>{{ pegawai.alamat }}</td>
                            <td class="text-center">
                                <a :href="`/pegawais/${pegawai.id}/edit`" class="btn btn-sm btn-primary me-2" @click.prevent="$inertia.visit(`/pegawais/${pegawai.id}/edit`)"> EDIT </a>
                                <button @click.prevent="deletePegawai(`${pegawai.id}`)" class="btn btn-sm btn-danger">DELETE</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    //import layout
    import LayoutApp from '../../Layouts/App.vue'
    
    //import Link dari inertia
    import { Link } from '@inertiajs/inertia-vue3';

    import { Inertia } from '@inertiajs/inertia'

    export default {

        //layout
        layout: LayoutApp,
        
        //register Link di component
        components: {
            Link
        },

        //props
        props: {
            pegawais: Array // <- nama props yang dibuat di controller saat parsing data
        },

        //define Composition Api
        setup() {

            function deletePegawai(id) {

                Inertia.delete(`/pegawais/${id}`)
            
            }

            return {
                deletePegawai
            }

        }
    }
</script>

<style>

</style>