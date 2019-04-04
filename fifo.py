def fifo_fn(frames, reference_string):

    capacity = int(frames)
    f,fault,top,pf = [],0,0,[]
    s = list(map(int,reference_string.strip().split()))
    xs = []
    for i in s:
        xs_in = []
        if i not in f:
            if len(f)<capacity:
                f.append(i)
            else:
                f[top] = i
                top = (top+1)%capacity
            fault += 1
            pf.append('Yes')
        else:
            pf.append('No')
        for x in f:
            xs_in.append(x)

        xs.append(xs_in)

    return pf, s, xs
