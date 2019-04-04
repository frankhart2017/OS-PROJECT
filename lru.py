def lru_fn(frames, reference_string):
    capacity = int(frames)
    f,st,fault,pf = [],[],0,[]
    s = list(map(int,reference_string.strip().split()))
    xs = []
    for i in s:
        xs_in = []
        if i not in f:
            if len(f)<capacity:
                f.append(i)
                st.append(len(f)-1)
            else:
                ind = st.pop(0)
                f[ind] = i
                st.append(ind)
            pf.append('Yes')
            fault += 1
        else:
            st.append(st.pop(st.index(f.index(i))))
            pf.append('No')
        for x in f:
            xs_in.append(x)

        xs.append(xs_in)

    return pf, s, xs
