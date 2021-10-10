# Toolman
•Course name: Web Computing and Web Systems
•Group name: Toolman
•Member 1: Run Zhang (zhangr75)
•Member 2: Boming Jin (jinb5)
•Live Server: http://3.13.254.133/

We did all add-on tasks

Answer for HTML picture and source tag
i). <picture>
        <source media="(min-width:450px)" srcset="images/loconmap.jpg" >
              <img src="images/smallloconmap.jpg" alt="map" style = "width: auto;" >
    </picture>

The selector will show locomap.jpg at first, and as the screen narrows, the width of the 
image will start to get shorter. When the width is less than 450px, the selector will show 
samlllocomap.jpg which is the small picture.

ii).
Three positive goals:
1.Suppose you use the img tag for high-resolution images. In this case, the same image will 
be applied on every device that has the application running and will affect the performance 
of lower resolution devices (e.g., mobile devices).
2.In most cases, we need to handle resolution switching and artwork at the same time, then the 
picture tag is the best choice.
3.Img tags result in longer image loading times and top-to-bottom image loading piece by piece.
4.We could store images in a landscape orientation or portrait orientation for future needs. Which makes
the site looks good.

iii).
When we are using <picture> and <source> tags, we need to store more pictures than we showed on the site,
so that will waste space to store those images. Because of that, we could use fewer pictures or using links to get the image.