<div class="   mt-10 relative border border-red-500" > 
    <img src="{{asset('/images/bannerimg.jpg')}}" alt=""
    class=" md:block  w-full  rounded-2xl xl:rounded-3xl">
    <div class=" absolute max-w-[60rem] bottom-0 border-2 lg:p-10 md:px-10 p-2 flex flex-col  sm:gap-7 items-center sm:items-start top-2 md:top-52 lg:top-52">
        <h1 class=" text-white  md:text-5xl lg:text-8xl font-serif font-semibold text-center lg:text-left md:text-left">
            {{$quote}}
        </h1>
        <p class=" text-gray-300  text-sm text-center md:text-left lg:text-left ">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad reprehenderit <br> eveniet non possimus autem sunt voluptatem, <br>rem laudantium deleniti ea iusto ratione molestiae.
        </p>
        <button 
        class=" bg-white mt-3 p-4 px-7 hover:shadow  rounded-full ">
            Get a quote
        </button>
    </div>
</div>