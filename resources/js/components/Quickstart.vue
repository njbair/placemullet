<template>
    <div class="form">
        <div class="mb-6">
            <div class="mb-2">
                <label class="block mb-1 pr-4" for="width">
                    Width:
                </label>
            </div>
            <div class="mb-2">
                <input v-model="width" class="appearance-none border-2 border-gray-300 rounded w-full py-2 px-4 leading-tight focus:outline-none focus:border-gray-400" type="number" min="10" max="1024" name="width" id="width" placeholder="e.g., 320">
            </div>
        </div>
        <div v-if="width" class="mb-6">
            <div class="mb-2">
                <label class="block mb-1 pr-4" for="height">
                    Height:
                </label>
            </div>
            <div class="mb-2">
                <input v-model="height" class="appearance-none border-2 border-gray-300 rounded w-full py-2 px-4 leading-tight focus:outline-none focus:border-gray-400" type="number" min="10" max="1024" name="height" id="height" placeholder="e.g., 240">
            </div>
        </div>
        <div class="mb-6">
            <div class="mb-2">
                <span class="block mb-1 pr-4">
                    Format:
                </span>
            </div>
            <div class="flex flex-wrap mb-2">
                <div class="mr-4 mb-2">
                    <input v-model="format" type="radio" name="format" id="format:none" value=""></input>
                    <label for="format:none">Don't care</label>
                </div>
                <div class="mr-4 mb-2">
                    <input v-model="format" type="radio" name="format" id="format:jpg" value="jpg"></input>
                    <label for="format:jpg">JPG</label>
                </div>
                <div class="mr-4 mb-2">
                    <input v-model="format" type="radio" name="format" id="format:png" value="png"></input>
                    <label for="format:png">PNG</label>
                </div>
                <div class="mr-4 mb-2">
                    <input v-model="format" type="radio" name="format" id="format:gif" value="gif"></input>
                    <label for="format:gif">GIF</label>
                </div>
                <div class="mr-4 mb-2">
                    <input v-model="format" type="radio" name="format" id="format:webp" value="webp"></input>
                    <label for="format:webp">WEBP</label>
                </div>
            </div>
        </div>
        <div class="mb-6">
            <div class="mb-2">
                <label class="block mb-1 pr-4" for="seed">
                    Seed:
                </label>
            </div>
            <div class="mb-2">
                <input v-model="seed" class="appearance-none border-2 border-gray-300 rounded w-full py-2 px-4 leading-tight focus:outline-none focus:border-gray-400" type="text" name="seed" id="seed" placeholder="e.g., &quot;ape-drape&quot;">
            </div>
            <div class="mb-2">
                <button v-on:click="randomizeSeed" class="py-2 px-4 rounded bg-gray-700 text-white text-xs">Randomize</button>
            </div>
        </div>
        <div>
            Result:
            <br/>
            <textarea :value="uri" class="appearance-none border-2 border-gray-300 rounded w-full py-2 px-4 leading-tight focus:outline-none focus:border-gray-400" readonly></textarea>
        </div>
        <p>
            <img :class="imageClass" :src="imageSrc">
        </p>
    </div>
</template>

<script>
    function generatePhrase() {
        const adjectives = [ 'Fabulous', 'Exquisite', 'Wonderful', 'Pristine', 'Rockin', 'Easygoing', 'Relaxing', 'Chillin', 'Modern', 'Retro', ];
        const nouns = [ 'Mullet', 'ApeDrape', 'HockeyHair', 'Neckwarmer', 'Skullet', 'KentuckyWaterfall', 'MississippiMudFlap', 'ForbiddenHair', 'TennesseeTopHat', 'AcheyBreakyHair', 'CamaroCut', 'RatTail', 'SoccerRocker', 'ShoLo', ];

        const adj = adjectives[Math.floor(Math.random() * adjectives.length)];
        const n = nouns[Math.floor(Math.random() * nouns.length)];

        return `${adj}${n}`;
    }

    function buildSizeString(width, height) {
        if ((width === '') && (height === '')) {
            return 'random';
        }
        if ((width !== '') && (height === '')) {
            return width;
        }
        if ((width === '') && (height !== '')) {
            return 'random';
        }
        if (width === height) {
            return width;
        }
        return `${width}x${height}`;
    }

    export default {
        props: {
            appUrl: String,
        },
        data() {
            return {
                width: '',
                height: '',
                format: '',
                seed: '',
                imageSrc: '',
                imageClass: '',
            }
        },
        computed: {
            uri() {
                var sizeString = buildSizeString(this.width, this.height);
                var output = `${this.appUrl}/${sizeString}`;

                if (this.format !== '') {
                    output += `.${this.format}`;
                }

                if (this.seed !== '') {
                    output += `?seed=${this.seed}`
                }

                return output;
            },
        },
        watch: {
            uri(newVal) {
                this.fetchImage(newVal);
                this.debounceImage();
            }
        },
        methods: {
            randomizeSeed() {
                this.seed = generatePhrase();
            },

            debounceImage() {
                this.imageClass = 'is-debouncing';
            },

            fetchImage: _.debounce(function(uri){
                const secondsSinceEpoch = Math.round(Date.now() / 1000)

                if (this.seed === '') {
                    this.imageSrc = `${uri}?bustCache=${secondsSinceEpoch}`
                } else {
                    this.imageSrc = `${uri}&bustCache=${secondsSinceEpoch}`;
                }
                this.imageClass = '';
            }, 2000),
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
