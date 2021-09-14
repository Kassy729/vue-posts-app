<template>
  <v-container>
    <v-row>
      <v-col>
        <div>
          <v-card v-for="post in posts" :key="post.id">
            <v-list-item-title @click="onClickPost(post.id)">
              제목 : {{ post.title }}</v-list-item-title
            >
            <v-list-item-content>내용 : {{ post.content }}</v-list-item-content>
            <v-card-text>{{ post.image }}</v-card-text>
            <hr />
          </v-card>
          <v-btn>
            <router-link to="/create">작성하기</router-link>
          </v-btn>
        </div>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
import axios from "axios";

export default {
  data() {
    return {
      posts: [],
    };
  },
  mounted() {
    axios
      .get("http://localhost:8000/api/index")
      .then((res) => {
        this.posts = res.data;
      })
      .catch((err) => {
        console.log(err);
        alert("실패");
      });
  },
  methods: {
    onClickPost(id) {
      this.$router.push({ path: "/show/" + id });
    },
  },
};
</script>

<style></style>
