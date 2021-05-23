<template>
  <div class="card shadow mt-3">
    <div class="card-body">
      <h5 class="card-title" style="color: blue">Add kontrak</h5>
      <form class="row g-3" @submit.prevent="store">
        <!-- <div class="col-md-6">
      <label for="inputEmail4" class="form-label">id</label>
      <input type="number" class="form-control" id="inputEmail4" 
      v-model="kontraks.id" />
      <div class="alert alert-danger" v-if="validation.id">
        {{ validation.id[0] }}
      </div>
    </div> -->
        <div class="col-md-12">
          <label for="inputPassword4" class="form-label">Mahasiswa Id</label>
          <input
            type="text"
            class="form-control"
            id="inputPassword4"
            v-model="kontraks.mahasiswa_id"
          />
          <div class="alert alert-danger" v-if="validation.mahasiswa_id">
            {{ validation.mahasiswa_id[0] }}
          </div>
        </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label">Semester_id</label>
          <input
            type="text"
            class="form-control"
            id="inputAddress"
            v-model="kontraks.semester_id"
          />
          <div class="alert alert-danger" v-if="validation.semester_id">
            {{ validation.semester_id[0] }}
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
    const kontraks = reactive({
      id: "",
      mahasiswa_id: "",
      semester_id: "",
    });
    const validation = ref([]);
    const router = useRouter();
    function store() {
      let id = kontraks.id;
      let mahasiswa_id = kontraks.mahasiswa_id;
      let semester_id = kontraks.semester_id;
      axios
        .post("http://127.0.0.1:8000/api/kontraks/create", {
          id: id,
          mahasiswa_id: mahasiswa_id,
          semester_id: semester_id,
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
      kontraks,
      validation,
      router,
      store,
    };
  },
};
</script>