import {onMounted, ref} from "vue";

export function useStoryProgression() {
    const storiesProgression = ref({})

    const getStoryProgression = (id) => {
        return storiesProgression.value?.[`${id}`]
    }

    const setStoryProgression = (storyId, chapterId, completed = false) => {
        const newProgression = {...storiesProgression.value, [storyId]: {chapterId, completed}}
        localStorage.setItem("storiesProgression", JSON.stringify(newProgression))
    }

    onMounted(() => {
        const progression = localStorage.getItem("storiesProgression")
        if (progression) {
            storiesProgression.value = JSON.parse(progression)
        }
    })

    return {getStoryProgression, setStoryProgression}
}