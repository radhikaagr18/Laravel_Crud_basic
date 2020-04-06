<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

class ProductController extends Controller
{
    // public function create(){
    //     $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    //     $query = "INSERT INTO products ('title','image','price','description') VALUES ('','$file','','')";
    //     if(mysqli_query($connect, $query))
    //     {
    //     echo 'Image Inserted into Database';
    //     }
    //     else echo 'facing issues';
    // }
    
    public function index()
    {
    	$products = Products::all();
    	return view('products',compact('products'));
    }


    /**
     * Upload image function
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
    	// $this->validate($request, [
    	// 	'title' => 'required',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);


        $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $input['image']);
        $title = $request->input('title');
        $image = $input['image'];
        $price = $request->input('price');
        $description = $request->input('description');
        $data=array('title'=>$title,"image"=>$image,"price"=>$price,"description"=>$description);

        Products::create($data);


    	return back()
    		->with('success','Image Uploaded successfully.');
    }


    public function edit($id)
    {
        $product = Products::find($id);
        return view('crud.edit', compact('product'));
    }


    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'title'=>'required',
        //     'price'=>'required'
        // ]);
        $product = Products::find($id);
        $product->title =  $request->get('title');
        $product->price = $request->get('price');
        $product->description = $request->get('description');

        if($request->file('image')!=NULL){
            $product->image = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $product->image);
        }
        
        $product->save();

        return view('crud.edit',compact('product'))->with('success', 'product updated!');
    }



    /**
     * Remove Image function
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	Products::find($id)->delete();
    	return back()
            ->with('success','Image removed successfully.');
            
    }


}
