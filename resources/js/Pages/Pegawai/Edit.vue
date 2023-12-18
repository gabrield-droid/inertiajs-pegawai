<template>

    <div>
        <div class="card border-0 rounded shadow">
            <div class="card-body">
                <h4>EDIT PEGAWAI</h4>
                <hr>
                <form @submit.prevent="updatePegawai">
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" v-model="pegawai.nama_pegawai" placeholder="Masukkan nama pegawai">
                        <div v-if="errors.nama_pegawai" class="mt-2 alert alert-danger">
                            {{ errors.nama_pegawai }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jabatan</label>
                        <div>
                            <label for="Direktur"><input type="radio" value="Direktur" v-model="pegawai.jabatan"/> Direktur</label>
                        </div>
                        <div>
                            <label for="Manajer"><input type="radio" value="Manajer" v-model="pegawai.jabatan"/> Manajer</label>
                        </div>
                        <div>
                            <label for="Sekretaris"><input type="radio" value="Sekretaris" v-model="pegawai.jabatan"/> Sekretaris</label>
                        </div>
                        <div>
                            <label for="Bendahara"><input type="radio" value="Bendahara" v-model="pegawai.jabatan"/> Bendahara</label>
                        </div>
                        <div>
                            <label for="Anggota"><input type="radio" value="Anggota" v-model="pegawai.jabatan"/> Anggota</label>
                        </div>
                        <div v-if="errors.jabatan" class="mt-2 alert alert-danger">
                            {{ errors.jabatan }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <div>
                            <label for="L"><input type="radio" value="L" v-model="pegawai.jenis_kelamin"/> L</label>
                        </div>
                        <div>
                            <label for="P"><input type="radio" value="P" v-model="pegawai.jenis_kelamin"/> P</label>
                        </div>
                        <div v-if="errors.jenis_kelamin" class="mt-2 alert alert-danger">
                            {{ errors.jenis_kelamin }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <div class="input"><input type="date" class="form-control" v-model="pegawai.tgl_lahir"></div>
                        <div v-if="errors.tgl_lahir" class="mt-2 alert alert-danger">
                            {{ errors.tgl_lahir }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control" rows="5" v-model="pegawai.alamat" placeholder="Masukkan alamat pegawai"></textarea>
                        <div v-if="errors.alamat" class="mt-2 alert alert-danger">
                            {{ errors.alamat }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-md shadow-sm me-2">UPDATE</button>
                        <button type="reset" class="btn btn-warning btn-md shadow-sm">RESET</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</template>

<script>
    //import layout
    import LayoutApp from '../../Layouts/App.vue'

    import { reactive } from 'vue'
    import { Inertia } from '@inertiajs/inertia'

    export default {

        //layout
        layout: LayoutApp,

        //props
        props: {
            pegawai: Object,
            errors: Object
        },

        //define Composition Api
        setup(props) {

            const pegawai = reactive({
                nama_pegawai: props.pegawai.nama_pegawai,
                jabatan: props.pegawai.jabatan,
                jenis_kelamin: props.pegawai.jenis_kelamin,
                tgl_lahir: props.pegawai.tgl_lahir,
                alamat: props.pegawai.alamat
            })

            function updatePegawai() {
                
                //define variable 
                let nama_pegawai   = pegawai.nama_pegawai
                let jabatan        = pegawai.jabatan
                let jenis_kelamin  = pegawai.jenis_kelamin
                let tgl_lahir      = pegawai.tgl_lahir
                let alamat         = pegawai.alamat

                //send data
                Inertia.put(`/pegawais/${props.pegawai.id}`, {
                    nama_pegawai: nama_pegawai,
                    jabatan: jabatan,
                    jenis_kelamin: jenis_kelamin,
                    tgl_lahir: tgl_lahir,
                    alamat: alamat
                })
             
            }

            return {
                pegawai,
                updatePegawai
            }

        }
    }
</script>