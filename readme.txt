vuejs에서 파일 업로드

    vuetify기능중 vue-file-input 태그가 있다 
    <v-file-input
        label="File input"
        enctype="multipart/form-data"
        @change="selectFile"
    ></v-file-input>
    이런식으로 활용이 가능하며 데이터를 전송할때는 formData에 append해서 전송한다.
      const form = new FormData();
      form.append("title", this.title);
      form.append("content", this.content);
      form.append("image", this.image);
      




