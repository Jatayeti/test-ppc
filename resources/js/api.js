import axios from "axios";

export const getProducts = async () => {
    const response = await axios.get('/api/products');
    return response.data;
};

export const calculatePrice = async (product_id, tax_number) => {
    const response = await axios.post('/api/calculate', {
        product_id: product_id,
        tax_number: tax_number
    });
    return response.data;
};
