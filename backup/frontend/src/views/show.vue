<template>
  <v-container>
    <v-card-title>제목 : {{ post.title }}</v-card-title>
    <v-card-text>내용 : {{ post.content }}</v-card-text>
    <v-img
      v-if="post.image"
      class="white--text align-end"
      width="30%"
      height="30%"
      :src="'http://localhost:8000/storage/image/' + post.image"
    ></v-img>
    <h3>댓글</h3>
    <div>
      <v-card v-for="comment in comments" :key="comment.id">
        <v-card-text>{{ comment.content }}</v-card-text>
        <v-btn @click="onClickCommentDelete(comment.id)">삭제</v-btn>
      </v-card>
    </div>
    <v-form ref="form" @submit.prevent="onSubmitComment">
      <v-text-field
        placeholder="입력하세요"
        v-model="content"
        style="width: 400px"
      ></v-text-field>
      <v-btn type="submit">작성</v-btn>
    </v-form>
    <br /><br />
    <v-btn @click="onClickUpdate(post.id)">수정</v-btn>
    <v-btn @click="onClickDelete(post.id)">삭제</v-btn>
    <router-link to="/index">목록보기</router-link>
  </v-container>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      post: [],
      comments: [],
      content: "",
    };
  },
  mounted() {
    axios
      .get("http://localhost:8000/api/show/" + this.$route.params.postId)
      .then((res) => {
        this.post = res.data[0];
        this.comments = res.data[1];
      })
      .catch((err) => {
        console.log(err);
        alert("실패");
      });
  },
  methods: {
    onClickUpdate(id) {
      this.$router.push({ path: "/update/" + id });
    },
    onClickDelete() {
      axios
        .delete("http://localhost:8000/api/" + this.$route.params.postId)
        .then(() => {
          window.location.href = "http://localhost:8080/index";
        })
        .catch((err) => {
          console.log(err);
          alert("실패");
        });
    },
    onSubmitComment() {
      axios
        .post(
          "http://localhost:8000/api/comment/" + this.$route.params.postId,
          {
            content: this.content,
          }
        )
        .then(() => {
          window.location.href =
            "http://localhost:8080/show/" + this.$route.params.postId;
        })
        .catch((err) => {
          console.log(err);
          alert("실패");
        });
    },
    onClickCommentDelete($id) {
      axios
        .delete("http://localhost:8000/api/comment_delete/" + $id)
        .then(() => {
          window.location.href =
            "http://localhost:8080/show/" + this.$route.params.postId;
        })
        .catch((err) => {
          "http://localhost:8080/show/" + this.$route.params.commentId;
          console.log(err);
          alert("실패");
        });
    },
  },
};
</script>

<style></style>
