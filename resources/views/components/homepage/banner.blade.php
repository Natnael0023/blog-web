<div class="   mt-10 relative min-h-[40rem] pt-20" > 
    {{-- <img src="{{asset('/images/bannerimg.jpg')}}" alt=""
    class=" md:block  w-full  rounded-2xl xl:rounded-3xl"> --}}
    <div class="gradient"></div>
    <div class="  flex flex-col items-center gap-5">
        <h1 id="h" class=" text-black  md:text-5xl lg:text-8xl font-serif font-semibold text-center lg:text-center md:text-left">
        </h1>
        <p class=" text-gray-400 py-5  text-xl text-center md:text-left lg:text-center ">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad reprehenderit <br> eveniet non possimus autem sunt voluptatem, <br>rem laudantium deleniti ea iusto ratione molestiae.
        </p>
        <button 
        class=" bg-black text-white font-semibold  mt-3 p-4 px-7 hover:shadow  rounded-full ">
            Get a quote
        </button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        var h = document.getElementById('h')
        var text = {!! json_encode($quote) !!}
        var speed = 100

        function typeWriter(){
            if(i < text.length) {
                h.innerHTML += text.charAt(i) 
                i++
                setTimeout(typeWriter, speed)
            }
        }

        var i =0;
        typeWriter()
    })
</script>