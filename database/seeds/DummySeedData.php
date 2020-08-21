<?php

use Illuminate\Database\Seeder;

use App\Tag;
use App\Category;
use App\Post;


class DummySeedData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $category1 = new Category();
        $category1->name = 'News';
        $category1->save();

        $tag1 = new Tag();
        $tag1->name = 'Customers';
        $tag1->save();


        $category2 = new Category();
        $category2->name = 'Design';
        $category2->save();

        $tag2 = new Tag();
        $tag2->name = 'Design';
        $tag1->save();

        $category3 = new Category();
        $category3->name = 'Jobs';
        $category3->save();

        $tag3 = new Tag();
        $tag3->name = 'Jobs';
        $tag3->save();



        $post1 = new Post();
        
        $post1->title = 'We relocated our office to a new designed garage';
        $post1->description = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s';
        $post1->content = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s';
      
        $post1->image = 'posts/4.jpg';
        $post1->category_id = $category1->id;
        $post1->save();
        $post1->tags()->attach([$tag1->id,$tag2->id]);


        $post2 = new Post();
        
        $post2->title = 'This is why its time to ditch dress codes at work';
        $post2->description = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s';
        $post2->content = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s';
      
        $post2->image = 'posts/5.jpg';
        $post2->category_id = $category2->id;
        $post2->save();
        $post2->tags()->attach([$tag2->id,$tag3->id]);

        $post3 = new Post();
        
        $post3->title = 'We relocated our office to a new designed garage';
        $post3->description = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s';
        $post3->content = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s';
      
        $post3->image = 'posts/6.jpg';
        $post3->category_id = $category3->id;
        $post3->save();
        $post3->tags()->attach([$tag1->id,$tag3->id]);

        $post4 = new Post();
        
        $post4->title = 'We relocated our office to a new designed garage';
        $post4->description = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s';
        $post4->content = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s';
      
        $post4->image = 'posts/7.jpg';
        $post4->category_id = $category1->id;
        $post4->save();
        // $post4->tags()->attach([$tag1->id,$tag3->id]);
    }
}
