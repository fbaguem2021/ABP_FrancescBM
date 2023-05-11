<template>
    <!-- <div> -->
    <div class="card border border-primary mt-2 mb-1">
        <div class="card-header bg-secondary fs-4 text-white rounded">Cicles
            <button @click="createModal()"
                class="btn btn-primary float-end">
                <i class="fa fa-plus"></i> Afegir Cicle
            </button>
        </div>
        <div class="card-body">
            <!-- <h5 class="card-title">Cicles</h5> -->
            <div v-if="cicles.length == 0"
                class="col-2 alert alert-primary mt-4 mx-auto text-center"
                role="alert">
                Encara no hi ha cap cicle donat d'alta
            </div>
            <div v-else>
                <table class="table custom-bordered-table border-primary">
                    <thead>
                        <tr>
                            <th class="col-1" scope="col">Sigles</th>
                            <th class="col-3" scope="col">Nom</th>
                            <th class="col-5" scope="col">Descripcio</th>
                            <th class="col-1 text-end" scope="col">Actiu</th>
                            <th class="col-2" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="cicle in cicles" :key="cicle.id">
                            <td>{{ cicle.sigles }}</td>
                            <td>{{ cicle.nom }}</td>
                            <td>{{ cicle.descripcio }}</td>
                            <td>
                                <div class="custom-control custom-checkbox text-end">
                                    <input id="actiu" name="actiu" type="checkbox"
                                    class="cistom-control-input" value="actiu"
                                    :checked="cicle.actiu" disabled>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-row-reverse col">
                                    <!-- <form action="{{ action([App\Http\Controllers\CicleController::class, 'destroy'], ['cicle' => cicle.id]) }}" method="POST"> -->
                                    <form @submit.prevent="createModal('borrar',cicle)">
                                        <input type="hidden" name="id" :value="cicle.id">
                                        <button type="submit" class="ms-2 btn btn-sm btn-danger">
                                            <i class="fa fa-trash" aria-hidden="true"></i> Esborrar
                                        </button>
                                    </form>
                                    <!-- <form action="{{ action([App\Http\Controllers\CicleController::class, 'edit'], ['cicle' => cicle.id]) }}" method="GET"> -->
                                    <form @submit.prevent="createModal('editar',cicle)">
                                        <input type="hidden" name="id" :value="cicle.id">
                                        <button type="submit" class="btn btn-sm btn-secondary">
                                            <i class="fa fa-edit" aria-hidden="true"></i> Editar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
                <!-- {{ $cicles->links() }} -->
        </div>
    </div>
    <div id="modal" class="modal" tabindex="-1">
        <div class="modal-dialog card border-secondary custom-card custom-rounded"
            :class="{ 'modalForm': isModalForm, 'modalBorrar': isModalBorrar }">
            <div v-if="isModalForm"
                class="modal-content py-4 px-4 bg-modal custom-rounded">
                <div class="mb-3 row">
                    <label for="sigles" class="col-sm-2 col-form-label">Sigles</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="sigles" v-model="selected.sigles" reqiored>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nom" v-model="selected.nom" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="descripcion" class="col-sm-2 col-form-label">Descripció</label>
                    <div class="col-sm-10">
                        <textarea cols="30" rows="10" class="form-control" name="desc" v-model="selected.descripcio"></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="actiu" class="col-sm-2">Actiu</label>
                    <div class="col-sm-10">
                        <div class="form-check form-check-inline">
                            <input type="radio" name="actiu" id="actiu1" class="form-check-input" value="1"  v-model="selected.actiu">
                            <label for="" class="form-check-label">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="actiu" id="actiu2" class="form-check-input" value="0" v-model="selected.actiu">
                            <label for="" class="form-check-label">No</label>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row-reverse">
                    <button class="btn btn-primary mx-2 col-3 col-md-2 tsize-btn"
                        @click="acceptModal(modalMode)"
                        type="button">Acceptar</button>
                    <button class="btn btn-secondary mx-2 col-3 col-md-2 tsize-btn"
                        @click="closeModal()"
                        type="button">Cancel·lar</button>
                </div>
            </div>
            <div v-if="isModalBorrar" class="modal-content py-4 px-4 bg-modal custom-rounded">
                <p>{{ deleteMessage }}</p>
            </div>
        </div>
    </div>

    <!-- </div> -->
</template>
<script>
import * as bootstrap from 'bootstrap'
import axios from 'axios';

export default {
    data() {
        return {
            cicles: Array,
            modal: bootstrap.Modal,
            modalMode: String,
            selected: Object
        }
    },
    computed: {
        deleteMessage() {
            return `Estas segur de borrar el cicle: ${this.selected.sigles}`
        },
        isModalForm() {
            return this.modalMode === 'crear' || this.modalMode === 'editar'
        },
        isModalBorrar() {
            return this.modalMode === 'borrar'
        }
    },
    mounted() {
        this.cicles=[]
        this.getCicles();
        this.modal = new bootstrap.Modal('#modal',{backdrop:'static'})
        // this.modalMode='crear'
        // this.modal.show()
        // modal.addEventListener('hide.bs.modal', event=>{ this.modalMode='' })
    },
    methods: {
        getCicles() {
            const self = this
            axios.get('/api/cicle')
                .then(response => {
                    self.cicles = response.data
                })
                .catch(error => console.error(error) )
        },
        createModal(mode='crear',cicle={ sigles:'', nom:'', desc:'', actiu:0 }) {
            // console.log(mode, cicle);
            this.modalMode = mode
            this.selected = cicle
            this.modal.show()
            // console.log('mode',this.modalMode);
        },
        acceptModal(mode) {
            if (mode === 'crear') {
                axios.post('api/cicle', this.selected)
                .then(response => {
                    console.log('post OK', response);
                    this.getCicles()
                })
                .catch(error => console.log('post KO',error))
            } else if (mode === 'editar') {
                axios.put(`api/cicle/${this.selected.id}`, this.selected)
                .then(response => {
                    console.log('put OK', response);
                    this.getCicles()
                })
                .catch(error => console.log('put KO',error))
            } else if (mode === 'borrar') {
                axios.delete(`api/cicle/${this.selected.id}`)
                .then(response => {
                    console.log('delete OK',response)
                    this.getCicles()
                })
                .catch(error => console.log('delete KO',error))
            }
            this.modal.hide()
        },
        closeModal() {
            this.modal.hide()
            this.selected = { sigles:'', nom:'', desc:'', actiu:0 }
        }
    },
}
</script>
<style scoped>
.rounded {
    border-radius: 1rem 0 0 0 !important;
    --bs-border-radius: 1rem;
}
.bg-modal {
    background-color: var(--bs-body-bg);
}
.modal-dialog {
    max-width: none;
}
.modalForm {
    max-width: 50% !important;
}
.modalBorrar {
    max-width: 25% !important;
}
</style>
