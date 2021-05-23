<template>
  <div class="card shadow mt-3">
    <div class="card-body">
      <h5 class="card-title" style="color: blue">Edit semester</h5>
      <form class="row g-3" @submit.prevent="update">
        <!-- <div class="col-md-6">
          <label for="inputEmail4" class="form-label">id</label>
          <input
            type="number"
            class="form-control"
            id="inputEmail4"
            v-model="semesters.id"
          />
          <div class="alert alert-danger" v-if="validation.id">
            {{ validation.id[0] }}
          </div>
        </div> -->
        <div class="col-md-12">
          <label for="inputPassword4" class="form-label">Semester</label>
          <input
            type="text"
            class="form-control"
            id="inputPassword4"
            v-model="semesters.semester"
          />
          <div class="alert alert-danger" v-if="validation.semester">
            {{ validation.semester[0] }}
          </div>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
import { onMounted, reactive, ref } from "vue";
import { useRouter } from "vue-router";
import axios from "axios";
import { useRoute } from "vue-router";
export default {
  setup() {
    const semesters = reactive({
      id: "",
      semester: "",
    });
    const validation = ref([]);
    const router = useRouter();
    const route = useRoute();
    console.log("ini id ", route.params.id);
    onMounted(() => {
      axios
        .get(`http://127.0.0.1:8000/api/semester-only/${route.params.id}`)
        .then((response) => {
          console.log(response.data.data);
          semesters.id = response.data.data[0].id;
          semesters.semester = response.data.data[0].semester;
        })
        .catch((error) => {
          console.log(error.response.data);
        });
    });
    function update() {
      let id = semesters.id;
      let semester = semesters.semester;
      axios
        .put(`http://127.0.0.1:8000/api/semesters/update/${id}`, {
          id: id,
          semester: semester,
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
      semesters,
      validation,
      router,
      update,
      route,
    };
  },
};
</script>
