<template>
  <v-container>
    <h1>게시글 작성</h1>
    <v-spacer></v-spacer>
    <br />
    <v-form ref="form" @submit.prevent="onsubmitForm">
      <v-row>
        <v-text-field
          placeholder="제목"
          v-model="title"
          style="width: 400px"
        ></v-text-field>
      </v-row>
      <v-row>
        <v-text-field
          placeholder="내용"
          v-model="content"
          style="width: 400px"
        ></v-text-field>
      </v-row>
      <v-file-input
        label="File input"
        enctype="multipart/form-data"
        @change="selectFile"
      ></v-file-input>
      <br />
      <v-btn type="submit">작성</v-btn>
    </v-form>
    <router-link to="/index">게시글보기</router-link>
  </v-container>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      title: "",
      content: "",
      image: "",
    };
  },

  methods: {
    onsubmitForm() {
      const form = new FormData();
      form.append("title", this.title);
      form.append("content", this.content);
      form.append("image", this.image);
      axios
        .post("http://localhost:8000/api/store", form)
        .then((res) => {
          console.log(res);
          window.location.href = "http://localhost:8080/index";
        })
        .catch((err) => {
          console.log(err);
          alert("실패");
        });
    },

    selectFile(file) {
      this.image = file;
    },
  },
};
</script>
