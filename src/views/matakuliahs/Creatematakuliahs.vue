<template>
  <div class="card shadow mt-3">
    <div class="card-body">
      <h5 class="card-title" style="color: blue">Add matakuliah</h5>
      <form class="row g-3" @submit.prevent="store">
        <!-- <div class="col-md-6">
      <label for="inputEmail4" class="form-label">id</label>
      <input type="number" class="form-control" id="inputEmail4" 
      v-model="matakuliahs.id" />
      <div class="alert alert-danger" v-if="validation.id">
        {{ validation.id[0] }}
      </div>
    </div> -->
        <div class="col-md-12">
          <label for="inputPassword4" class="form-label">Nama matakuliah</label>
          <input
            type="text"
            class="form-control"
            id="inputPassword4"
            v-model="matakuliahs.nama_matakuliah"
          />
          <div class="alert alert-danger" v-if="validation.nama_matakuliah">
            {{ validation.nama_matakuliah[0] }}
          </div>
        </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label">Sks</label>
          <input
            type="text"
            class="form-control"
            id="inputAddress"
            v-model="matakuliahs.sks"
          />
          <div class="alert alert-danger" v-if="validation.sks">
            {{ validation.sks[0] }}
          </div>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
import { reactive, ref } from "vue";
import { useRouter } from "vue-router";
import axios from "axios";
export default {
  setup() {
    const matakuliahs = reactive({
      id: "",
      nama_matakuliah: "",
      sks: "",
    });
    const validation = ref([]);
    const router = useRouter();
    function store() {
      let id = matakuliahs.id;
      let nama_matakuliah = matakuliahs.nama_matakuliah;
      let sks = matakuliahs.sks;
      axios
        .post("http://127.0.0.1:8000/api/matakuliahs/create", {
          id: id,
          nama_matakuliah: nama_matakuliah,
          sks: sks,
        })
        .then(() => {
          router.push({
            name: "Index",
          });
        })
        .catch((error) => {
          console.log(error);
        });
    }
    return {
      matakuliahs,
      validation,
      router,
      store,
    };
  },
};
</script>