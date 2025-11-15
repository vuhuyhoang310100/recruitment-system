import { Pagination } from "./pagination";

interface SinglePermission {
    id: number;
    name: string;
    description?: string;
    created_at: string;
    updated_at: string;
}

export interface Permission extends Pagination {
    data: SinglePermission[];
}
