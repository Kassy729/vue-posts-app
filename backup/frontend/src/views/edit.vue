<template>
  <v-container>
    <h1>게시글 수정</h1>
    <v-spacer></v-spacer>
    <br />
    <v-form ref="form" @submit.prevent="onEditForm">
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
      <v-btn type="submit">작성</v-btn>
    </v-form>
  </v-container>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      title: "",
      content: "",
    };
  },

  methods: {
    onEditForm() {
      axios
        .patch(
          "http://localhost:8000/api/update/" + this.$route.params.postId,
          {
            title: this.title,
            content: this.content,
          }
        )
        .then(() => {
          window.location.href = "http://localhost:8080/index";
        })
        .catch((err) => {
          console.log(err);
          alert("실패");
        });
    },
  },
};
</script>
