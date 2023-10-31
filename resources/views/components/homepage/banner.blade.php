<div class="   mt-10 relative" > 
    <img src="{{asset('/images/bannerimg.jpg')}}" alt=""
    class=" md:block  w-full  rounded-2xl xl:rounded-3xl">
    <div class=" absolute max-w-[60rem] bottom-0 border-2 p-10 flex flex-col gap-7 items-start top-12 md:top-52 lg:top-52">
        <h1 class=" text-white  md:text-5xl lg:text-8xl font-serif font-semibold text-left">
            {{$quote}}
        </h1>
        <p class=" text-gray-300  text-sm ">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad reprehenderit <br> eveniet non possimus autem sunt voluptatem obcaecati, <br>rem laudantium deleniti ea iusto ratione molestiae facilis.
        </p>
        <button 
        class=" bg-white p-4 px-7 hover:shadow  rounded-full ">
            Get a quote
        </button>
    </div>
</div>