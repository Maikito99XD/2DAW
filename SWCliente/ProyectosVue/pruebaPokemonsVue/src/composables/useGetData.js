import axios from 'axios';
import { ref } from 'vue';

export const useGetData=()=>{
    const datos = ref(null);
    const getData = async (url) => {
        try{
            const resultado = await axios.get(url);
            datos.value = resultado.data;
        }
        catch(error){
            console.log(error);
        }
    };
    return{
        getData,
        datos
    }
};
