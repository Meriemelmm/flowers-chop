<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Produits | Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="min-h-screen flex flex-col">
        <nav class="bg-white border-b border-gray-200 px-6 py-4 shadow">
            <div class="flex justify-between items-center">
                <h1 class="text-xl font-semibold text-gray-900">Gestion des Produits</h1>
                <a href="#" class="text-gray-600 hover:text-gray-900"><i class="fas fa-user-circle text-2xl"></i></a>
            </div>
        </nav>

        <div class="flex flex-1">
            <aside class="w-64 bg-white shadow-md min-h-screen p-5">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Menu</h2>
                <nav class="space-y-2">
                    <a href="#" class="block px-4 py-2 text-gray-700 bg-gray-100 rounded-md"><i class="fas fa-box mr-2"></i> Produits</a>
                    <a href="#" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-md"><i class="fas fa-users mr-2"></i> Utilisateurs</a>
                </nav>
            </aside>

            <main class="flex-1 p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold">Liste des Produits</h2>
                    <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700"><i class="fas fa-plus"></i> Ajouter</a>
                </div>

                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <table class="min-w-full border-collapse border border-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="p-3 border border-gray-200">Image</th>
                                <th class="p-3 border border-gray-200">Nom</th>
                                <th class="p-3 border border-gray-200">Prix</th>
                                <th class="p-3 border border-gray-200">Stock</th>
                                <th class="p-3 border border-gray-200">type</th>
                                <th class="p-3 border border-gray-200">actions</th>
                            </tr>
                        </thead>
                        <tbody> 
                            
                            @foreach($products as $product)
                            <tr class="text-center">
                                <td class="p-3 border border-gray-200"><img src="{{ asset('storage/'. $product->product_image) }}" class="h-12 w-12 object-cover mx-auto"></td>
                                <td class="p-3 border border-gray-200">{{ $product->product_name }}</td>
                                <td class="p-3 border border-gray-200">{{ $product->product_prix}} €</td>
                                <td class="p-3 border border-gray-200">{{ $product->product_stock }}</td>
                                <td class="p-3 border border-gray-200">{{ $product->types->type_name }}</td>

                          
                                <td class="p-3 border border-gray-200">
                                    <a href="{{route('edit.product',['produit'=>$product->id])}}" class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('products.destroy',['produit'=> $product->id]) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded"><i class="fas fa-trash"></i></button>
                            </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </main>
        </div>
    </div>
</body>
</html>
