<template>

    <div class="container-fluid">
        <div class="row">

            <div class="col-1">
                <a href="#/pages" class="btn btn-secondary" title="Voltar">
                    <i class="fa fa-arrow-circle-left"></i>
                </a>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="title">
                            <i class="fa fa-file-text-o"></i>
                            Nova página
                            <small>Inclusão de nova página no site</small>
                        </h5>

                        <form @submit.prevent="save()">
                            <div class="form-group">
                                <label for="title">Título</label>
                                <input id="title" type="text" class="form-control" placeholder="Título da página"
                                       v-model="page.title"/>
                            </div>

                            <div class="form-group">
                                <label for="slug">URL</label>
                                <input id="slug" type="text" class="form-control" placeholder="Url da página"
                                       v-model="page.slug"/>
                            </div>

                            <div class="form-group">
                                <label for="body">Conteúdo</label>
                                <textarea id="body" class="form-control" rows="3" v-model="page.body">
                                </textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Salvar</button>

                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

</template>

<script>
  import swal from 'sweetalert2'

  export default {
    data () {
      return {
        page: {}
      }
    },
    methods: {
      save () {
        this.$store.dispatch('createPage', this.page)
          .then((res) => {
            swal({
              title: 'Salvo com sucesso!',
              text: 'Sua nova página já está dosponível.',
              type: 'success',
              confirmButtonText: 'ok'
            })
            this.$router.push({path: '/pages'})
          })
          .catch((err) => {
            if (err) {
              swal({
                title: 'Algo deu errado!',
                text: 'Uma situação inesperado ocorreu no servidor, por favor, entre em contato com o administrador.',
                type: 'error',
                confirmButtonText: 'Eu entendo'
              })
            }
          })
      }
    }
  }
</script>

<style scoped>

</style>