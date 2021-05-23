<template>
  <div class="home">
    <!-- <Slider /> -->
    <hr class="my-3" />
    <router-link class="btn btn-primary" to="/createsemesters"
      >Add semester</router-link
    >
    <table class="table tble-striped">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Semester</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(semester, index) in semesters" :key="index">
          <td>{{ semester.id }}</td>
          <td>{{ semester.semester }}</td>

          <td>
            <router-link
              class="btn btn-success"
              :to="{ name: 'Editsemester', params: { id: semester.id } }"
              >Edit</router-link
            >
            <button
              @click.prevent="semestersDelete(semester.id)"
              class="btn btn-danger"
            >
              delete
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from "axios";
// @ is an alias to /src
import { onMounted, ref } from "vue";
export default {
  setup() {
    let semesters = ref([]);
    onMounted(() => {
      axios
        .get("http://127.0.0.1:8000/api/semesters")
        .then((response) => {
          console.log(response.data.data);
          semesters.value = response.data.data;
        })
        .catch((error) => {
          console.log(error);
        });
    });
    function semestersDelete(id) {
      axios
        .delete(`http://127.0.0.1:8000/api/semesters/delete/${id}`)
        .then(() => {
          let z = this.semesters
            .map((semesters) => semesters.id)
            .indexOf(id);
          this.semesters.splice(z, 1);
        })
        .catch((error) => {
          console.log(error);
        });
    }
    return {
      semesters,
      semestersDelete,
    };
  },
};
</script>