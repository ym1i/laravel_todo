<script setup>
const props = defineProps({
  type: {
    type: String,
    default: 'button',
  },
  color: {
      type: String,
      default: '#1d4ed8'
    },
  outlined: {
    type: Boolean,
    default: false,
  }
})

const emit = defineEmits(['click'])
const handleClick = () => emit('click')
</script>

<template>
    <button :type="type" @click="handleClick" :class="outlined ? 'outlinedStyle' : 'btn'" :style="`background-color: ${color}`">
        <slot></slot>
    </button>
</template>

<style scoped>
.btn {
    max-height: 50px;
    color: white;
    /* background-color: #1d4ed8; */
    padding: 0.625rem 1.25rem;
    font-size: 0.875rem;
    font-weight: 500;
    border-radius: 0.375rem;
    border: none;
    outline: none;
    cursor: pointer;
}

.btn:hover {
    background-color: #1e40af; /* Equivalent to hover:bg-blue-800 */
}

.btn:focus {
    box-shadow: 0 0 0 0.25rem rgba(59, 130, 246, 0.5); /* Equivalent to focus:ring-4 focus:ring-blue-300 */
}

.btn:focus:not(:focus-visible) {
    outline: none; /* Equivalent to focus:outline-none */
}

.outlinedStyle {
    max-height: 50px;
    background-color: transparent;
    color: #1d4ed8;
    padding: 0.625rem 1.25rem;
    border-radius: 0.375rem; 
    border: solid 1px #1d4ed8;
    cursor: pointer; 
    font-size: 1rem; 
    font-weight: 600;
    transition: background-color 0.3s ease;
}
</style>