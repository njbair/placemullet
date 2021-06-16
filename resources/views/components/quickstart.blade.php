<h3 class="mt-0">
    Quick Start
</h3>

<p>
    {{$appName}} is a free image placeholder service for web
    designers, serving <em>at least several</em> mullets each year.
</p>

<p>
    Use this interactive mullet builder to generate your own custom mullet.
</p>

<form>
    <div class="md:flex md:items-center mb-6">
        <div class="md:w-1/3">
            <label class="block md:text-right mb-1 md:mb-0 pr-4" for="size">
                Size (optional):
            </label>
        </div>
        <div class="md:w-2/3">
            <input class="appearance-none border-2 border-gray-300 rounded w-full py-2 px-4 leading-tight focus:outline-none focus:bg-white" type="text" name="size" id="size" placeholder="e.g., &quot;320x240&quot;, &quot;150&quot;">
        </div>
    </div>
    <div class="md:flex md:items-start mb-6">
        <div class="md:w-1/3">
            <span class="block md:text-right mb-1 md:mb-0 pr-4">
                Format:
            </span>
        </div>
        <div class="md:w-2/3">
            <input type="radio" name="format" id="format:none" value=""></input>
            <label for="format:none">Don't care</label>
            <br/>
            <input type="radio" name="format" id="format:jpg" value="jpg"></input>
            <label for="format:jpg">JPG</label>
            <br/>
            <input type="radio" name="format" id="format:png" value="png"></input>
            <label for="format:png">PNG</label>
            <br/>
            <input type="radio" name="format" id="format:gif" value="gif"></input>
            <label for="format:gif">GIF</label>
            <br/>
            <input type="radio" name="format" id="format:webp" value="webp"></input>
            <label for="format:webp">WEBP</label>
        </div>
    </div>
</form>

<p>
    You’re welcome.
</p>
