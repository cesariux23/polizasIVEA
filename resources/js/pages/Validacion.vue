<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import validacion from '@/routes/validacion';
import { Save, Search } from '@lucide/vue';
import { Ref, ref } from 'vue';

interface Factura {
    UUID: string,
    Fecha:Date,
    RfcEmisor: String,
    NombreEmisor:String,
    TotalImpuestosTrasladados:Number,
    total: Number,
}

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Validación',
                href: validacion.index(),
            },
        ],
    },
});

const poliza: Ref <string> = ref('');
const facturas = ref<Factura[]>([]);

function fetchPolizaResults(){
    
}

function searchPoliza (event: Event) {
    if(poliza.value.trim().length > 0){
        fetchPolizaResults()
    }
}
</script>

<template>
    <Head title="Validacion de polizas" />

    <div
        class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4"
    >
        <form
            class="flex gap-4"
            @submit.prevent="searchPoliza"
        >
            <input  class="flex-1 p-2 rounded-md border" type="text" placeholder="Número de poliza" v-model="poliza">
            <button class="bg-blue-600/80 hover:bg-blue-600 text-white p-2 rounded-md border flex gap-2" type="submit">
                <Search></Search>
                Buscar
            </button>
        </form>
        <div class=" flex-1 flex gap-2">
            <div class=" flex-1 rounded-md bg-gray-100 p-4">
                <h3 class="text-xl font-bold">
                    Datos de la poliza
                </h3>

            </div>
            <div class=" flex-1 flex flex-col rounded-md bg-gray-100 p-4 gap-2">
                <h3 class="text-xl font-bold">
                    Facturas asociadas
                </h3>
                <div class="flex gap-2">
                    <input class="flex-1 p-2 rounded-md border bg-white" type="text" placeholder="Buscar factura">
                    <button class="bg-blue-600/80 hover:bg-blue-600 text-white p-2 rounded-md border flex gap-2">
                        <Search></Search>
                        Buscar
                    </button>
                </div>
            </div>
        </div>
        <div class="flex">
            <div class=" flex-1">

            </div>
            <button class="bg-emerald-500/80 hover:bg-emerald-500 text-white p-2 rounded-md border flex gap-2">
                <Save></Save>
                Guardar cambios
            </button>
        </div>
    </div>
</template>
