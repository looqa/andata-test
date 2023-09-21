import {ref, watchEffect} from "vue";


export default function useScreenWidth() {
    const screenWidth = ref(window.innerWidth)

    watchEffect(() => {
        const updateScreenWidth = () => {
            screenWidth.value = window.innerWidth
        }
        window.addEventListener('resize', updateScreenWidth)
        return () => {
            window.removeEventListener('resize', updateScreenWidth)
        }
    })
    return screenWidth;
}