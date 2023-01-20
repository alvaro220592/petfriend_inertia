<template>
    <div>
        <form @submit.prevent="submit" id="form">
            <div class="sm:block md:flex w-full">
                <div class="block md:pr-3 sm:w-full md:w-1/2">
                    <InputLabel for="nome" value="Nome" />
                    <TextInput class="block w-full" type="text" name="" id="nome" v-model="form.nome" />
                </div>
                <div class="block md:pl-3 sm:w-full md:w-1/2">
                    <InputLabel for="sobrenome" value="Sobrenome" />
                    <TextInput class="block w-full" type="text" name="" id="sobrenome" v-model="form.sobrenome" />
                </div>
            </div>
            <InputLabel for="telefone" value="Telefone" />
            <TextInput class="block w-full" type="text" name="" id="telefone" v-model="form.telefone" />
            
            <InputLabel for="email" value="Email" />
            <TextInput class="block w-full" type="text" name="" id="email" v-model="form.email" />
            
            <InputLabel for="cep" value="Cep" />
            <TextInput class="block w-full" type="text" name="" id="cep" v-model="form.cep" @keyup="buscaCep" />
            
            <InputLabel for="logradouro" value="Logradouro" />
            <TextInput class="block w-full" type="text" name="" id="logradouro" v-model="form.logradouro" />

            <InputLabel for="num_endereco" value="Nº" />
            <TextInput class="block w-full" type="text" name="" id="num_endereco" v-model="form.num_endereco" />

            <InputLabel for="localidade" value="Cidade" />
            <TextInput class="block w-full" type="text" name="" id="localidade" v-model="form.localidade" />

            <InputLabel for="bairro" value="Bairro" />
            <TextInput class="block w-full" type="text" name="" id="bairro" v-model="form.bairro" />

            <InputLabel for="uf" value="UF" />
            <TextInput class="block w-full" type="text" name="" id="uf" v-model="form.uf" />

            <input type="hidden" v-model="form.complemento">
            <input type="hidden" v-model="form.ddd">
            <input type="hidden" v-model="form.gia">
            <input type="hidden" v-model="form.ibge">
            <input type="hidden" v-model="form.siafi">

            <PrimaryButton class="mt-3" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Register
            </PrimaryButton>
        </form>
    </div>
</template>

<script setup>
    import TextInput from "@/Components/TextInput.vue";
    import InputLabel from "@/Components/InputLabel.vue";
    import PrimaryButton from "@/Components/PrimaryButton.vue"
    import { useForm } from '@inertiajs/inertia-vue3';
    import { inject } from 'vue'

    const form = useForm({
        nome: '',
        sobrenome: '',
        num_endereco: '',

        telefone: '',
        email: '',

        cep: '',
        logradouro: '',
        localidade: '',
        bairro: '',
        uf: '',
        complemento: '',
        ddd: '',
        gia: '',
        ibge: '',
        siafi: '',
    })
    
    const swal = inject('$swal')
    const options = {
        confirmButtonColor: '#41b882',
        cancelButtonColor: '#ff7674',
    };

    const submit = () => {
        form.post(route('clients.store'), {
            onFinish: () => {
                document.getElementById('form').reset()
                
                const Toast = swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', swal.stopTimer)
                    toast.addEventListener('mouseleave', swal.resumeTimer)
                }
                })

                Toast.fire({
                icon: 'success',
                title: 'Cadastrado com sucesso!'
                })
            }
        })
    }

    const buscaCep = () => {
        if (form.cep.length == 8) {
            axios.get(`https://viacep.com.br/ws/${form.cep}/json/`).then((res) => {
                
                form.logradouro = res.data.logradouro
                form.localidade = res.data.localidade
                form.bairro = res.data.bairro
                form.uf = res.data.uf
                form.complemento = res.data.complemento
                form.ddd = res.data.ddd
                form.gia = res.data.gia
                form.ibge = res.data.ibge
                form.siafi = res.data.siafi
                document.getElementById('num_endereco').focus()
            });
        }
    }
</script>

<script>
    export default {
        
    };
</script>

<style lang="scss" scoped></style>
