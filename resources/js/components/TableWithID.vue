<template>
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">Таблица с ID:</div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">ID</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(data, index) in table_data">
              <td scope="row">{{ index }}</td>
              <td scope="row">{{ data.id }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  computed: {
    ...mapGetters(["table_data"]),
  },
};
</script>
