<template>
  <div style="display: inline-flex; margin: 10px">
    <v-select
      v-model="chosen"
      class="style-chooser"
      :options="options"
      label="name"
    ></v-select>
    <div class="navbar"></div>
    <div>
      <div id="over" class="overlay">
        <div class="lds-ring"><div></div></div>
      </div>
      <button
        :disabled="isDisabled"
        @click="click"
        id="button"
        class="btn active"
        type="button"
      >
        Создать
      </button>
    </div>
  </div>
</template>


<script>
import { mapActions, mapGetters, mapMutations } from "vuex";

export default {
  name: "Navbar",
  data() {
    return {
      isDisabled: false,
      chosen: "",
      options: [
        {
          id: 1,
          name: "Сделки",
        },
        {
          id: 2,
          name: "Контакты",
        },
        {
          id: 3,
          name: "Компании",
        },
      ],
    };
  },
  computed: {
    ...mapGetters(["deactivate_loader"]),
  },
  watch: {
    deactivate_loader(val) {
      val ? this.deactivateLoader() : "";
    },
  },
  methods: {
    ...mapActions(["addContract", "addContact", "addCompany"]),
    ...mapMutations(["deactivateChange"]),
    click() {
      this.activateLoader();
      switch (this.chosen.id) {
        case 1:
          this.addContract();
          break;
        case 2:
          this.addContact();
          break;
        case 3:
          this.addCompany();
      }
    },
    activateLoader() {
      this.deactivateChange();
      var el = document.getElementById("button");
      el.classList.remove("active");
      var el2 = document.getElementById("over");
      el2.classList.add("active");
    },
    deactivateLoader() {
      var el = document.getElementById("over");
      el.classList.remove("active");
      var el2 = document.getElementById("button");
      el2.classList.add("active");
    },
  },
  mounted() {
    if (!this.isDisabled) {
      var el = document.getElementById("button");
      el.classList.add("enabled");
    }
  },
};
</script>
<style lang="scss">
@import "vue-select/src/scss/vue-select.scss";
</style>

